<?php

namespace App\Entity;

use App\Repository\UserSettingsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserSettingsRepository::class)]
class UserSettings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'userSettings', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user_id = null;

    #[ORM\Column(length: 1)]
    private ?string $get_admin_notifications = null;

    #[ORM\Column(length: 1)]
    private ?string $get_news_notifications = null;

    #[ORM\Column(length: 1)]
    private ?string $show_progress = null;

    #[ORM\Column(length: 1)]
    private ?string $show_public_profile = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getGetAdminNotifications(): ?string
    {
        return $this->get_admin_notifications;
    }

    public function setGetAdminNotifications(string $get_admin_notifications): self
    {
        $this->get_admin_notifications = $get_admin_notifications;

        return $this;
    }

    public function getGetNewsNotifications(): ?string
    {
        return $this->get_news_notifications;
    }

    public function setGetNewsNotifications(string $get_news_notifications): self
    {
        $this->get_news_notifications = $get_news_notifications;

        return $this;
    }

    public function getShowProgress(): ?string
    {
        return $this->show_progress;
    }

    public function setShowProgress(string $show_progress): self
    {
        $this->show_progress = $show_progress;

        return $this;
    }

    public function getShowPublicProfile(): ?string
    {
        return $this->show_public_profile;
    }

    public function setShowPublicProfile(string $show_public_profile): self
    {
        $this->show_public_profile = $show_public_profile;

        return $this;
    }
}
