<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240419202459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invoice (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, invoice_date DATE DEFAULT NULL, invoice_number INTEGER DEFAULT NULL, customer_id INTEGER DEFAULT NULL)');
        $this->addSql('CREATE TABLE invoice_line (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, invoice_id_id INTEGER NOT NULL, description CLOB NOT NULL, quantity INTEGER NOT NULL, amount NUMERIC(12, 2) NOT NULL, vat_amount NUMERIC(12, 2) NOT NULL, total_vat NUMERIC(12, 2) NOT NULL, CONSTRAINT FK_D3D1D693429ECEE2 FOREIGN KEY (invoice_id_id) REFERENCES invoice (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_D3D1D693429ECEE2 ON invoice_line (invoice_id_id)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE invoice_line');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
