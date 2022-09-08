<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220908102841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire ADD utilisateur_id INT NOT NULL, ADD publication_id INT NOT NULL, DROP publication');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC38B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('CREATE INDEX IDX_67F068BCFB88E14F ON commentaire (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC38B217A7 ON commentaire (publication_id)');
        $this->addSql('ALTER TABLE publication ADD utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_AF3C6779FB88E14F ON publication (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCFB88E14F');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC38B217A7');
        $this->addSql('DROP INDEX IDX_67F068BCFB88E14F ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BC38B217A7 ON commentaire');
        $this->addSql('ALTER TABLE commentaire ADD publication VARCHAR(255) NOT NULL, DROP utilisateur_id, DROP publication_id');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C6779FB88E14F');
        $this->addSql('DROP INDEX IDX_AF3C6779FB88E14F ON publication');
        $this->addSql('ALTER TABLE publication DROP utilisateur_id');
    }
}
