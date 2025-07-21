<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="Booking",
 *     type="object",
 *     title="Booking",
 *     required={"id", "tiket_id", "nama_pemesan", "jumlah", "total_harga", "status"},
 *     
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="tiket_id", type="integer", example=5),
 *     @OA\Property(property="nama_pemesan", type="string", example="Andi Setiawan"),
 *     @OA\Property(property="jumlah", type="integer", example=2),
 *     @OA\Property(property="total_harga", type="number", format="float", example=150000.00),
 *     @OA\Property(property="status", type="string", example="Pending"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-01-01T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-01-01T12:00:00Z")
 * )
 */
class Booking {}
