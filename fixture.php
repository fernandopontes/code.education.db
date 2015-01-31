<?php
require_once 'config.php';
require_once 'funcoes.php';

print("#### Executando Fixture ####\n");

$conexao = conexao_db($config);

print("Removendo Tabelas");

$conexao->query("DROP TABLE IF EXISTS site_sobre");
$conexao->query("DROP TABLE IF EXISTS site_produtos");
$conexao->query("DROP TABLE IF EXISTS site_servicos");

print(" - OK \n");

print("Criando Tabelas");

$conexao->query("
                    CREATE TABLE site_produtos (
                      id int(10) unsigned NOT NULL AUTO_INCREMENT,
                      titulo varchar(255) NOT NULL,
                      imagem varchar(50) DEFAULT NULL,
                      texto text NOT NULL,
                      PRIMARY KEY (id)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
                    
                    CREATE TABLE site_servicos (
                      id int(10) unsigned NOT NULL AUTO_INCREMENT,
                      titulo varchar(255) NOT NULL,
                      imagem varchar(50) DEFAULT NULL,
                      texto text NOT NULL,
                      PRIMARY KEY (id)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
                    
                    CREATE TABLE site_sobre (
                      id int(10) unsigned NOT NULL AUTO_INCREMENT,
                      texto text NOT NULL,
                      PRIMARY KEY (id)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
            ");

print(" - OK \n");

print("Inserindo dados nas Tabelas");

$conexao->exec("
                    INSERT INTO site_produtos (id, titulo, imagem, texto) VALUES
                    (1, 'Produto 1', NULL, '<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>'),
                    (2, 'Produto 2', NULL, '<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>'),
                    (3, 'Produto 3', NULL, '<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>');

                    INSERT INTO site_servicos (id, titulo, imagem, texto) VALUES
                    (1, 'Servi&ccedil;o 1', NULL, '<p>This blog post shows a few different types of content thats supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>\r\n                <hr>\r\n                <p>Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\r\n                <blockquote>\r\n                    <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n                </blockquote>\r\n                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n                <h2>Heading</h2>\r\n                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>\r\n                <h3>Sub-heading</h3>\r\n                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n                <pre><code>Example code block</code></pre>\r\n                <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>\r\n                <h3>Sub-heading</h3>\r\n                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\r\n                <ul>\r\n                    <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\r\n                    <li>Donec id elit non mi porta gravida at eget metus.</li>\r\n                    <li>Nulla vitae elit libero, a pharetra augue.</li>\r\n                </ul>\r\n                <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>\r\n                <ol>\r\n                    <li>Vestibulum id ligula porta felis euismod semper.</li>\r\n                    <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>\r\n                    <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>\r\n                </ol>\r\n                <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>'),
                    (2, 'Servi&ccedil;o 2', NULL, '<p>This blog post shows a few different types of content that''s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>\r\n                <hr>\r\n                <p>Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\r\n                <blockquote>\r\n                    <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n                </blockquote>\r\n                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n                <h2>Heading</h2>\r\n                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>\r\n                <h3>Sub-heading</h3>\r\n                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n                <pre><code>Example code block</code></pre>\r\n                <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>\r\n                <h3>Sub-heading</h3>\r\n                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\r\n                <ul>\r\n                    <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\r\n                    <li>Donec id elit non mi porta gravida at eget metus.</li>\r\n                    <li>Nulla vitae elit libero, a pharetra augue.</li>\r\n                </ul>\r\n                <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>\r\n                <ol>\r\n                    <li>Vestibulum id ligula porta felis euismod semper.</li>\r\n                    <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>\r\n                    <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>\r\n                </ol>\r\n                <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>');

                    INSERT INTO site_sobre (id, texto) VALUES
                    (1, '<h2 class=\"blog-post-title\">Sample blog post</h2>\r\n                <p class=\"blog-post-meta\">January 1, 2014 by <a href=\"#\">Mark</a></p>\r\n\r\n                <p>This blog post shows a few different types of content that''s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>\r\n                <hr>\r\n                <p>Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\r\n                <blockquote>\r\n                    <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n                </blockquote>\r\n                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n                <h2>Heading</h2>\r\n                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>\r\n                <h3>Sub-heading</h3>\r\n                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n                <pre><code>Example code block</code></pre>\r\n                <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>\r\n                <h3>Sub-heading</h3>\r\n                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\r\n                <ul>\r\n                    <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\r\n                    <li>Donec id elit non mi porta gravida at eget metus.</li>\r\n                    <li>Nulla vitae elit libero, a pharetra augue.</li>\r\n                </ul>\r\n                <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>\r\n                <ol>\r\n                    <li>Vestibulum id ligula porta felis euismod semper.</li>\r\n                    <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>\r\n                    <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>\r\n                </ol>\r\n                <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>');
          ");

print(" - OK \n");

print("#### Concluído ####\n");



