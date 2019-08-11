<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait TSlug
{
    /**
     * Generate md5 slug for model based on model id and created_at fields.
     *
     * @param string $model
     * @param int $id
     * @param string $createdAt
     * @return string
     */
    public function hashSlug(string $model, int $id, string $createdAt): string
    {
        return md5(sprintf("%s|%d|%s", $model, $id, $createdAt));
    }

    /**
     * Generate seo friendly slug
     *
     * @param string $str
     * @return string
     */
    public function seoSlug(string $str): string
    {
        return Str::slug($str);
    }
}
