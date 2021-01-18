<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210112100055 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE design (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, url_adobe VARCHAR(255) DEFAULT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE design_techno (design_id INT NOT NULL, techno_id INT NOT NULL, INDEX IDX_9B467EDFE41DC9B2 (design_id), INDEX IDX_9B467EDF51F3C1BC (techno_id), PRIMARY KEY(design_id, techno_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE img_design (id INT AUTO_INCREMENT NOT NULL, design_id INT DEFAULT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_106AEA50E41DC9B2 (design_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE img_project (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_62DC9406166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, design_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, url VARCHAR(255) DEFAULT NULL, repository_git VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_2FB3D0EEE41DC9B2 (design_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_techno (project_id INT NOT NULL, techno_id INT NOT NULL, INDEX IDX_2E230596166D1F9C (project_id), INDEX IDX_2E23059651F3C1BC (techno_id), PRIMARY KEY(project_id, techno_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE techno (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, img_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE design_techno ADD CONSTRAINT FK_9B467EDFE41DC9B2 FOREIGN KEY (design_id) REFERENCES design (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE design_techno ADD CONSTRAINT FK_9B467EDF51F3C1BC FOREIGN KEY (techno_id) REFERENCES techno (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE img_design ADD CONSTRAINT FK_106AEA50E41DC9B2 FOREIGN KEY (design_id) REFERENCES design (id)');
        $this->addSql('ALTER TABLE img_project ADD CONSTRAINT FK_62DC9406166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEE41DC9B2 FOREIGN KEY (design_id) REFERENCES design (id)');
        $this->addSql('ALTER TABLE project_techno ADD CONSTRAINT FK_2E230596166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_techno ADD CONSTRAINT FK_2E23059651F3C1BC FOREIGN KEY (techno_id) REFERENCES techno (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE design_techno DROP FOREIGN KEY FK_9B467EDFE41DC9B2');
        $this->addSql('ALTER TABLE img_design DROP FOREIGN KEY FK_106AEA50E41DC9B2');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEE41DC9B2');
        $this->addSql('ALTER TABLE img_project DROP FOREIGN KEY FK_62DC9406166D1F9C');
        $this->addSql('ALTER TABLE project_techno DROP FOREIGN KEY FK_2E230596166D1F9C');
        $this->addSql('ALTER TABLE design_techno DROP FOREIGN KEY FK_9B467EDF51F3C1BC');
        $this->addSql('ALTER TABLE project_techno DROP FOREIGN KEY FK_2E23059651F3C1BC');
        $this->addSql('DROP TABLE design');
        $this->addSql('DROP TABLE design_techno');
        $this->addSql('DROP TABLE img_design');
        $this->addSql('DROP TABLE img_project');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_techno');
        $this->addSql('DROP TABLE techno');
    }
}
