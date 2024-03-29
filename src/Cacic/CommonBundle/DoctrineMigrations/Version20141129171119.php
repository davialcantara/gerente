<?php

namespace Cacic\CommonBundle\Migrations;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141129171119 extends AbstractMigration implements ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "postgresql", "Migration can only be executed safely on 'postgresql'.");
        $sm = $this->connection->getSchemaManager();

        $logger = $this->container->get('logger');
        $rootDir = $this->container->get('kernel')->getRootDir();
        $upgrade1 = $rootDir."/../src/Cacic/CommonBundle/Resources/data/upgrade-3.0b4-4.sql";
        $upgradeSQL1 = file_get_contents($upgrade1);

        $logger->debug("Arquivo de atualização: $upgrade1");

        // Chama o container para executar o arquivo de atualização
        // FIXME: Só funciona no PostgreSQL
        $this->addSql($upgradeSQL1);
        $this->addSql("SELECT gera_relatorio_wmi()");

    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
