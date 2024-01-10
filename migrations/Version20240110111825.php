<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240110111825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exercise (id INT AUTO_INCREMENT NOT NULL, course_id INT DEFAULT NULL, classroom_id INT NOT NULL, thematic_id INT NOT NULL, origin_id INT NOT NULL, created_by_id INT NOT NULL, name VARCHAR(255) NOT NULL, chapter VARCHAR(255) NOT NULL, keywords LONGTEXT NOT NULL, difficulty INT NOT NULL, duration DOUBLE PRECISION NOT NULL, origin_name VARCHAR(255) NOT NULL, origin_information LONGTEXT NOT NULL, proposedby_type VARCHAR(255) NOT NULL, proposed_by_first_name VARCHAR(255) NOT NULL, proposed_by_last_name VARCHAR(255) NOT NULL, INDEX IDX_AEDAD51C591CC992 (course_id), INDEX IDX_AEDAD51C6278D5A8 (classroom_id), INDEX IDX_AEDAD51C2395FCED (thematic_id), INDEX IDX_AEDAD51C56A273CC (origin_id), INDEX IDX_AEDAD51CB03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercise_skill (exercise_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_7B0B13B5E934951A (exercise_id), INDEX IDX_7B0B13B55585C142 (skill_id), PRIMARY KEY(exercise_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51C591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51C6278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id)');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51C2395FCED FOREIGN KEY (thematic_id) REFERENCES thematic (id)');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51C56A273CC FOREIGN KEY (origin_id) REFERENCES origin (id)');
        $this->addSql('ALTER TABLE exercise ADD CONSTRAINT FK_AEDAD51CB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE exercise_skill ADD CONSTRAINT FK_7B0B13B5E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exercise_skill ADD CONSTRAINT FK_7B0B13B55585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE file ADD exercise_id INT NOT NULL');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id)');
        $this->addSql('CREATE INDEX IDX_8C9F3610E934951A ON file (exercise_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F3610E934951A');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51C591CC992');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51C6278D5A8');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51C2395FCED');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51C56A273CC');
        $this->addSql('ALTER TABLE exercise DROP FOREIGN KEY FK_AEDAD51CB03A8386');
        $this->addSql('ALTER TABLE exercise_skill DROP FOREIGN KEY FK_7B0B13B5E934951A');
        $this->addSql('ALTER TABLE exercise_skill DROP FOREIGN KEY FK_7B0B13B55585C142');
        $this->addSql('DROP TABLE exercise');
        $this->addSql('DROP TABLE exercise_skill');
        $this->addSql('DROP INDEX IDX_8C9F3610E934951A ON file');
        $this->addSql('ALTER TABLE file DROP exercise_id');
    }
}
