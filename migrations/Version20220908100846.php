<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220908100846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP createur, DROP publication');
        $this->addSql('ALTER TABLE publication DROP createur');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire ADD createur VARCHAR(255) NOT NULL, ADD publication VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE publication ADD createur VARCHAR(255) NOT NULL');
    }
}
