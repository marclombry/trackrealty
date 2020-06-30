<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200630145037 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE realty DROP FOREIGN KEY FK_627221C67B3B43D');
        $this->addSql('DROP INDEX IDX_627221C67B3B43D ON realty');
        $this->addSql('ALTER TABLE realty CHANGE users_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE realty ADD CONSTRAINT FK_627221CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_627221CA76ED395 ON realty (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64971C56C69');
        $this->addSql('DROP INDEX IDX_8D93D64971C56C69 ON user');
        $this->addSql('ALTER TABLE user DROP realty_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE realty DROP FOREIGN KEY FK_627221CA76ED395');
        $this->addSql('DROP INDEX IDX_627221CA76ED395 ON realty');
        $this->addSql('ALTER TABLE realty CHANGE user_id users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE realty ADD CONSTRAINT FK_627221C67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_627221C67B3B43D ON realty (users_id)');
        $this->addSql('ALTER TABLE user ADD realty_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64971C56C69 FOREIGN KEY (realty_id) REFERENCES realty (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64971C56C69 ON user (realty_id)');
    }
}
