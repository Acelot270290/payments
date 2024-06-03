<?php

namespace App\Actions;

use App\Models\CourseUser;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;

class CourseUserAction
{
    public function __construct()
    {
        // Configurar Stripe
        Stripe::setApiKey(config('stripe.secret'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Criar PaymentIntent no Stripe
        $paymentIntent = PaymentIntent::create([
            'amount' => $request->valor_pago * 100, // Convertendo para centavos
            'currency' => 'usd',
            'payment_method' => $request->payment_method,
            'confirm' => true,
        ]);

        // Criar a inscrição no banco de dados
        $courseUser = CourseUser::create([
            'course_id' => $request->course_id,
            'user_id' => $request->user_id,
            'data_inscricao' => now(),
            'valor_pago' => $request->valor_pago,
            'status' => 'Pago',
        ]);

        return $courseUser;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseUser $courseUser)
    {
        $courseUser->update($request->all());
        return $courseUser;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseUser $courseUser)
    {
        $courseUser->delete();
    }
}
