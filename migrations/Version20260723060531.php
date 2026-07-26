<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260723060531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création la table users';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
        CREATE TABLE users (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            firstname VARCHAR(255) NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password_hash VARCHAR(255) NOT NULL,

            PRIMARY KEY (id),
            UNIQUE KEY uniq_users_email (email)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE users');
    }
}

