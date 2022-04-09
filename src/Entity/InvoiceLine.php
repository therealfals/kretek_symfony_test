<?php

namespace App\Entity;

use App\Repository\InvoiceLineRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvoiceLineRepository::class)
 */
class InvoiceLine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Invoice::class, inversedBy="invoiceLines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $invoice;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\NotBlank(message="Description is required")
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank(message="Description is required")
     */
    private $quantity;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\NotBlank(message="Description is required")
     */
    private $amount;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\NotBlank(message="Description is required")
     */
    private $vatAmount;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\NotBlank(message="Description is required")
     */
    private $totalVat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(?Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getVatAmount(): ?float
    {
        return $this->vatAmount;
    }

    public function setVatAmount(?float $vatAmount): self
    {
        $this->vatAmount = $vatAmount;

        return $this;
    }

    public function getTotalVat(): ?float
    {
        return $this->totalVat;
    }

    public function setTotalVat(?float $totalVat): self
    {
        $this->totalVat = $totalVat;

        return $this;
    }
}
