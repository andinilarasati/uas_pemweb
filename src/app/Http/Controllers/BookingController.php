<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
use App\Helper\EncryptionHelper;

class BookingController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/bookings",
     *     operationId="getBookings",
     *     tags={"Bookings"},
     *     summary="Get all bookings",
     *     description="Returns a list of all bookings.",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="success"),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Booking")
     *             )
     *         )
     *     ),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function index()
    {
        $data = Booking::all();
        $responseData = [
            'message' => 'success',
            'data' => $data,
        ];
        $encryptResponse = EncryptionHelper::encrypt(json_encode($responseData));
        return response()->json(['data' => $encryptResponse]);
    }

    /**
     * @OA\Post(
     *     path="/api/bookings",
     *     operationId="storeBooking",
     *     tags={"Bookings"},
     *     summary="Create a new booking",
     *     description="Stores a new booking.",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"tiket_id", "nama_pemesan", "jumlah", "total_harga"},
     *             @OA\Property(property="tiket_id", type="integer", example=1),
     *             @OA\Property(property="nama_pemesan", type="string", example="John Doe"),
     *             @OA\Property(property="jumlah", type="integer", example=2),
     *             @OA\Property(property="total_harga", type="number", format="float", example=499.99)
     *         )
     *     ),
     *     @OA\Response(response=200, description="Booking created successfully", @OA\JsonContent(@OA\Property(property="data", type="string", example="eyJpdiI6In..."))),
     *     @OA\Response(response=500, description="Error storing booking")
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tiket_id' => 'required|integer',
            'nama_pemesan' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'total_harga' => 'required|numeric',
        ]);

        try {
            $booking = Booking::create($validated);
            $responseData = [
                'message' => 'Booking created successfully',
                'data' => $booking,
            ];
            $encryptedResponse = EncryptionHelper::encrypt(json_encode($responseData));
            return response()->json(['data' => $encryptedResponse]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error storing booking: ' . $e->getMessage()], 500);
        }
    }

    /**
     * @OA\Get(
     *     path="/api/bookings/{id}",
     *     operationId="getBookingById",
     *     tags={"Bookings"},
     *     summary="Get booking by ID",
     *     description="Returns a single booking.",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Successful operation", @OA\JsonContent(@OA\Property(property="data", type="string", example="eyJpdiI6In..."))),
     *     @OA\Response(response=404, description="Booking not found"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }
        $responseData = ['message' => 'success', 'data' => $booking];
        $encrypted = EncryptionHelper::encrypt(json_encode($responseData));
        return response()->json(['data' => $encrypted]);
    }

    /**
     * @OA\Put(
     *     path="/api/bookings/{id}",
     *     operationId="updateBooking",
     *     tags={"Bookings"},
     *     summary="Update a booking",
     *     description="Updates an existing booking.",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(required=true, @OA\JsonContent(
     *         @OA\Property(property="nama_pemesan", type="string", example="Updated Name"),
     *         @OA\Property(property="jumlah", type="integer", example=3),
     *         @OA\Property(property="total_harga", type="number", format="float", example=599.99),
     *         @OA\Property(property="status", type="string", example="Confirmed")
     *     )),
     *     @OA\Response(response=200, description="Booking updated successfully", @OA\JsonContent(@OA\Property(property="data", type="string", example="eyJpdiI6In..."))),
     *     @OA\Response(response=404, description="Booking not found"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $validated = $request->validate([
            'nama_pemesan' => 'sometimes|string|max:255',
            'jumlah' => 'sometimes|integer',
            'total_harga' => 'sometimes|numeric',
            'status' => 'sometimes|string',
        ]);

        $booking->update($validated);
        $responseData = ['message' => 'Booking updated successfully', 'data' => $booking];
        $encrypted = EncryptionHelper::encrypt(json_encode($responseData));
        return response()->json(['data' => $encrypted]);
    }

    /**
     * @OA\Delete(
     *     path="/api/bookings/{id}",
     *     operationId="deleteBooking",
     *     tags={"Bookings"},
     *     summary="Delete a booking",
     *     description="Deletes a booking by ID.",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Booking deleted successfully", @OA\JsonContent(@OA\Property(property="data", type="string", example="eyJpdiI6In..."))),
     *     @OA\Response(response=404, description="Booking not found"),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function destroy($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->delete();
        $responseData = ['message' => 'Booking deleted successfully', 'data' => ['id' => $id]];
        $encrypted = EncryptionHelper::encrypt(json_encode($responseData));
        return response()->json(['data' => $encrypted]);
    }

    /**
     * @OA\Post(
     *     path="/api/bookings/decrypt",
     *     operationId="decryptBookingResponse",
     *     tags={"Bookings"},
     *     summary="Decrypt encrypted booking data",
     *     description="Decrypts the encrypted booking response.",
     *     security={{"ApiKeyAuth":{}}},
     *     @OA\RequestBody(required=true, @OA\JsonContent(
     *         required={"data"},
     *         @OA\Property(property="data", type="string", example="eyJpdiI6IjFPU2h...")
     *     )),
     *     @OA\Response(response=200, description="Decrypted response", @OA\JsonContent(
     *         @OA\Property(property="message", type="string", example="success"),
     *         @OA\Property(property="data", type="object")
     *     )),
     *     @OA\Response(response=400, description="Decryption failed")
     * )
     */
    public function decryptResponse(Request $request)
    {
        $encryptData = $request->input('data');

        try {
            $decryptedJson = EncryptionHelper::decrypt($encryptData);
            $decoded = json_decode($decryptedJson, true);
            return response()->json($decoded);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Decrypt Failed',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
