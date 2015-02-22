<?php
require_once 'config.php';
require_once 'funcoes.php';

print("#### Executando Fixture ####\n");

$conexao = conexao_db($config);

print("Removendo Tabelas");

$conexao->query("DROP TABLE IF EXISTS site_sobre");
$conexao->query("DROP TABLE IF EXISTS site_produtos");
$conexao->query("DROP TABLE IF EXISTS site_servicos");
$conexao->query("DROP TABLE IF EXISTS site_usuarios");

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

                    CREATE TABLE IF NOT EXISTS site_usuarios (
                      id int(10) unsigned NOT NULL AUTO_INCREMENT,
                      nome varchar(50) NOT NULL,
                      email varchar(100) NOT NULL,
                      senha varchar(70) NOT NULL,
                      data_login datetime NULL,
                      situacao enum('Ativo','Bloqueado') NOT NULL,
                      PRIMARY KEY (id)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
            ");

print(" - OK \n");

print("Inserindo dados nas Tabelas");

// Criptografa a senha padrão
$opcoes = array('cost' => 12, 'salt' => uniqid(mt_rand(), true));
$senha_provisoria = password_hash($config['painel-senha'], PASSWORD_BCRYPT, $opcoes);

$conexao->exec("
                    INSERT INTO site_produtos (id, titulo, imagem, texto) VALUES
                    (1, 'Produto 1', NULL, '<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>'),
                    (2, 'Produto 2', NULL, '<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>'),
                    (3, 'Produto 3', NULL, '<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>');

                    INSERT INTO site_servicos (id, titulo, imagem, texto) VALUES
                    (1, 'Servi&ccedil;o 1', NULL, '<p>This blog post shows a few different types of content thats supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p><hr><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p><blockquote><p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p></blockquote><p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p><h2>Heading</h2><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p><h3>Sub-heading</h3><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p><pre><code>Example code block</code></pre><p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p><h3>Sub-heading</h3><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p><ul>    <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>    <li>Donec id elit non mi porta gravida at eget metus.</li>    <li>Nulla vitae elit libero, a pharetra augue.</li></ul><p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p><ol>    <li>Vestibulum id ligula porta felis euismod semper.</li>    <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>    <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li></ol><p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>'),
                    (2, 'Servi&ccedil;o 2', NULL, '<p>This blog post shows a few different types of content that''s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p><hr><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p><blockquote>    <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p></blockquote><p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p><h2>Heading</h2><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p><h3>Sub-heading</h3><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p><pre><code>Example code block</code></pre><p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p><h3>Sub-heading</h3><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p><ul>    <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>    <li>Donec id elit non mi porta gravida at eget metus.</li>    <li>Nulla vitae elit libero, a pharetra augue.</li></ul><p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p><ol>    <li>Vestibulum id ligula porta felis euismod semper.</li>    <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>    <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li></ol><p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>');

                    INSERT INTO site_sobre (id, texto) VALUES
                    (1, '<h2>Sample blog post</h2><p>January 1, 2014 by Mark</p><p>This blog post shows a few different types of content thats supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p><hr><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p><blockquote>    <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p></blockquote><p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p><h2>Heading</h2><p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p><h3>Sub-heading</h3><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p><pre><code>Example code block</code></pre><p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p><h3>Sub-heading</h3><p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p><ul>    <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>    <li>Donec id elit non mi porta gravida at eget metus.</li>    <li>Nulla vitae elit libero, a pharetra augue.</li></ul><p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p><ol>    <li>Vestibulum id ligula porta felis euismod semper.</li>    <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>    <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li></ol><p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>');

                    INSERT INTO site_usuarios (id, nome, email, senha, data_login, situacao) VALUES
                    (1, '{$config['painel-user']}', '{$config['painel-email']}', '$senha_provisoria', '', 'Ativo');
                ");

print(" - OK \n");

print("#### Concluído ####\n");



