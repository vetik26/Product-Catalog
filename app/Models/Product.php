<?php

namespace App\Models;

class Product
{
    private string $id;
    private string $title;
    private string $category;
    private int $quantity;

    public const CATEGORIES = [
        self::GUNS,
        self::FOOD,
        self::FURNITURE,
    ];

    public function __construct(string $id, string $title, string $category, int $quantity)
    {
        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
        $this->quantity = $quantity;

    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }


}