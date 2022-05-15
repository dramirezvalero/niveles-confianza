<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NivelConfianzaRepository")
 * @ORM\Table(name="nivel_confianza")
 * @UniqueEntity(fields={"ncz"}, errorPath="ncn", message="post.ncz_unique")
 *
 * Defines the properties of the NivelConfianza entity to represent the blog posts.
 *
 * See https://symfony.com/doc/current/doctrine.html#creating-an-entity-class
 *
 * Tip: if you have an existing database, you can generate these entity class automatically.
 * See https://symfony.com/doc/current/doctrine/reverse_engineering.html
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 * @author Yonel Ceruto <yonelceruto@gmail.com>
 */
class NivelConfianza
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private $ncn;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $ncz;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getNcn(): ?string
    {
        return $this->ncn;
    }

    public function setNcn(?string $ncn): void
    {
        $this->ncn = $ncn;
    }

    public function getNcz(): ?int
    {
        return $this->ncz;
    }

    public function setNcz(int $ncz): void
    {
        $this->ncz = $ncz;
    }

}
