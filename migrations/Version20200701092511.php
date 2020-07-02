<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200701092511 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tenant ADD realty_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tenant ADD CONSTRAINT FK_4E59C46271C56C69 FOREIGN KEY (realty_id) REFERENCES realty (id)');
        $this->addSql('CREATE INDEX IDX_4E59C46271C56C69 ON tenant (realty_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tenant DROP FOREIGN KEY FK_4E59C46271C56C69');
        $this->addSql('DROP INDEX IDX_4E59C46271C56C69 ON tenant');
        $this->addSql('ALTER TABLE tenant DROP realty_id');
    }
}
