<?php

namespace M9snikfeed\PhpShikimori\Models\User;

use M9snikfeed\PhpShikimori\Enums\Gender;
use M9snikfeed\PhpShikimori\Enums\Locale;

class User
{
    /**
     * @var int
     */
    private int $id;
    /**
     * @var string
     */
    private string $nickname;
    /**
     * @var string
     */
    private string $avatar;
    /**
     * @var Image
     */
    private Image $image;
    /**
     * @var string
     */
    private string $lastOnlineAt;
    /**
     * @var string|null
     */
    private ?string $name;
    /**
     * @var string|null
     */
    private ?string $sex;
    /**
     * @var string|null
     */
    private ?string $website;
    /**
     * @var string|null
     */
    private ?string $birthOn;
    /**
     * @var string|null
     */
    private ?string $locale;

    /**
     * @param object|null $user
     */
    public function __construct(object $user = null)
    {
        if ($user){
            $this->id = $user->id;
            $this->nickname = $user->nickname;
            $this->avatar = $user->avatar;
            $this->image = new Image((object) $user->image);
            $this->lastOnlineAt = $user->last_online_at;
            $this->name = $user->name;
            $this->sex = $user->sex;
            $this->website = $user->website;
            $this->birthOn = $user->birth_on;
            $this->locale = $user->locale;
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * @return Image
     */
    public function getImage(): Image
    {
        return $this->image;
    }

    /**
     * @param Image $image
     */
    public function setImage(Image $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getLastOnlineAt(): string
    {
        return $this->lastOnlineAt;
    }

    /**
     * @param string $lastOnlineAt
     */
    public function setLastOnlineAt(string $lastOnlineAt): void
    {
        $this->lastOnlineAt = $lastOnlineAt;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getSex(): ?string
    {
        return $this->sex;
    }

    /**
     * @param Gender $sex
     */
    public function setSex(Gender $sex): void
    {
        $this->sex = $sex->name;
    }

    /**
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param string|null $website
     */
    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }

    /**
     * @return string|null
     */
    public function getBirthOn(): ?string
    {
        return $this->birthOn;
    }

    /**
     * @param string|null $birthOn
     */
    public function setBirthOn(?string $birthOn): void
    {
        $this->birthOn = $birthOn;
    }

    /**
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @param Locale $locale
     */
    public function setLocale(Locale $locale): void
    {
        $this->locale = $locale->name;
    }
}