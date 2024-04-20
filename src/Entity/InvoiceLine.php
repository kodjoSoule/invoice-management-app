<?php

namespace App\Entity;

use App\Repository\InvoiceLineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceLineRepository::class)]
class InvoiceLine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Invoice::class, inversedBy: 'invoiceLines')]
    #[ORM\JoinColumn(nullable: false)]
    private $invoice_id;

    #[ORM\Column(type: 'text')]
    private $Description;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\Column(type: 'decimal', precision: 12, scale: 2)]
    private $amount;

    #[ORM\Column(type: 'decimal', precision: 12, scale: 2)]
    private $vat_amount;

    #[ORM\Column(type: 'decimal', precision: 12, scale: 2)]
    private $total_vat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoiceId(): ?Invoice
    {
        return $this->invoice_id;
    }

    public function setInvoiceId(?Invoice $invoice_id): self
    {
        $this->invoice_id = $invoice_id;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getVatAmount(): ?string
    {
        return $this->vat_amount;
    }

    public function setVatAmount(string $vat_amount): self
    {
        $this->vat_amount = $vat_amount;

        return $this;
    }

    public function getTotalVat(): ?string
    {
        return $this->total_vat;
    }

    public function setTotalVat(string $total_vat): self
    {
        $this->total_vat = $total_vat;

        return $this;
    }
}
