<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\OneToOne(mappedBy: 'user_id', cascade: ['persist', 'remove'])]
    private ?UserProfile $userProfile = null;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: UserLinks::class)]
    private Collection $userLinks;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: TaskComment::class)]
    private Collection $taskComments;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: CourseComment::class)]
    private Collection $courseComments;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: ArticleComment::class)]
    private Collection $articleComments;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: UserProgress::class, orphanRemoval: true)]
    private Collection $userProgress;

    #[ORM\OneToOne(mappedBy: 'user_id', cascade: ['persist', 'remove'])]
    private ?Subscription $subscription = null;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Order::class)]
    private Collection $orders;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 1)]
    private ?string $status = null;

    #[ORM\Column(length: 1)]
    private ?string $type = null;

    #[ORM\OneToOne(mappedBy: 'user_id', cascade: ['persist', 'remove'])]
    private ?UserSettings $userSettings = null;

    public function __construct()
    {
        $this->userLinks = new ArrayCollection();
        $this->taskComments = new ArrayCollection();
        $this->courseComments = new ArrayCollection();
        $this->articleComments = new ArrayCollection();
        $this->userProgress = new ArrayCollection();
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUserProfile(): ?UserProfile
    {
        return $this->userProfile;
    }

    public function setUserProfile(?UserProfile $userProfile): self
    {
        // unset the owning side of the relation if necessary
        if ($userProfile === null && $this->userProfile !== null) {
            $this->userProfile->setUserId(null);
        }

        // set the owning side of the relation if necessary
        if ($userProfile !== null && $userProfile->getUserId() !== $this) {
            $userProfile->setUserId($this);
        }

        $this->userProfile = $userProfile;

        return $this;
    }

    /**
     * @return Collection<int, UserLinks>
     */
    public function getUserLinks(): Collection
    {
        return $this->userLinks;
    }

    public function addUserLink(UserLinks $userLink): self
    {
        if (!$this->userLinks->contains($userLink)) {
            $this->userLinks->add($userLink);
            $userLink->setUserId($this);
        }

        return $this;
    }

    public function removeUserLink(UserLinks $userLink): self
    {
        if ($this->userLinks->removeElement($userLink)) {
            // set the owning side to null (unless already changed)
            if ($userLink->getUserId() === $this) {
                $userLink->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TaskComment>
     */
    public function getTaskComments(): Collection
    {
        return $this->taskComments;
    }

    public function addTaskComment(TaskComment $taskComment): self
    {
        if (!$this->taskComments->contains($taskComment)) {
            $this->taskComments->add($taskComment);
            $taskComment->setUserId($this);
        }

        return $this;
    }

    public function removeTaskComment(TaskComment $taskComment): self
    {
        if ($this->taskComments->removeElement($taskComment)) {
            // set the owning side to null (unless already changed)
            if ($taskComment->getUserId() === $this) {
                $taskComment->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CourseComment>
     */
    public function getCourseComments(): Collection
    {
        return $this->courseComments;
    }

    public function addCourseComment(CourseComment $courseComment): self
    {
        if (!$this->courseComments->contains($courseComment)) {
            $this->courseComments->add($courseComment);
            $courseComment->setUserId($this);
        }

        return $this;
    }

    public function removeCourseComment(CourseComment $courseComment): self
    {
        if ($this->courseComments->removeElement($courseComment)) {
            // set the owning side to null (unless already changed)
            if ($courseComment->getUserId() === $this) {
                $courseComment->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ArticleComment>
     */
    public function getArticleComments(): Collection
    {
        return $this->articleComments;
    }

    public function addArticleComment(ArticleComment $articleComment): self
    {
        if (!$this->articleComments->contains($articleComment)) {
            $this->articleComments->add($articleComment);
            $articleComment->setUserId($this);
        }

        return $this;
    }

    public function removeArticleComment(ArticleComment $articleComment): self
    {
        if ($this->articleComments->removeElement($articleComment)) {
            // set the owning side to null (unless already changed)
            if ($articleComment->getUserId() === $this) {
                $articleComment->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UserProgress>
     */
    public function getUserProgress(): Collection
    {
        return $this->userProgress;
    }

    public function addUserProgress(UserProgress $userProgress): self
    {
        if (!$this->userProgress->contains($userProgress)) {
            $this->userProgress->add($userProgress);
            $userProgress->setUserId($this);
        }

        return $this;
    }

    public function removeUserProgress(UserProgress $userProgress): self
    {
        if ($this->userProgress->removeElement($userProgress)) {
            // set the owning side to null (unless already changed)
            if ($userProgress->getUserId() === $this) {
                $userProgress->setUserId(null);
            }
        }

        return $this;
    }

    public function getSubscription(): ?Subscription
    {
        return $this->subscription;
    }

    public function setSubscription(Subscription $subscription): self
    {
        // set the owning side of the relation if necessary
        if ($subscription->getUserId() !== $this) {
            $subscription->setUserId($this);
        }

        $this->subscription = $subscription;

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders->add($order);
            $order->setUserId($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getUserId() === $this) {
                $order->setUserId(null);
            }
        }

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUserSettings(): ?UserSettings
    {
        return $this->userSettings;
    }

    public function setUserSettings(?UserSettings $userSettings): self
    {
        // unset the owning side of the relation if necessary
        if ($userSettings === null && $this->userSettings !== null) {
            $this->userSettings->setUserId(null);
        }

        // set the owning side of the relation if necessary
        if ($userSettings !== null && $userSettings->getUserId() !== $this) {
            $userSettings->setUserId($this);
        }

        $this->userSettings = $userSettings;

        return $this;
    }
}
