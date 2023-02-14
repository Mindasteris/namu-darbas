<?php
 
namespace App\Http\Controllers;

use App\Services\DriverExpenseService;
  
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    // public function index(DriverExpenseService $driverExpenseService)
    // {
    //     // Data is hardcoded for test purposes.
    //     $drivers = ['John Sigono', 'Tom Davidson'];

    //     $expenses = $this->generateTestExpenses();

    //     return view('home', [
    //         'data' => $driverExpenseService->calculateDriverExpenses($drivers, $expenses),
    //     ]);
    // }

    // private function generateTestExpenses()
    // {
    //     $result = [];

    //     $expenseTypes = [
    //         'Fuel (EFS)', 
    //         'Fuel (Comdata)', 
    //         'Insurance (Truck)', 
    //         'Insurance (Trailer)', 
    //         'Engine oil', 
    //         'Tires', 
    //         'Truck wash', 
    //         'Trailer wash', 
    //         'Flight tickets',
    //     ];

    //     $iterations = rand(1, 9);

    //     for ($i = 0; $i < $iterations; $i++) 
    //     {
    //         $expense = $expenseTypes[$i];
            
    //         $result[$expense] = number_format($this->randomDecimal(1, 5000), 2, '.', '');
    //     }

    //     return $result;
    // }

    // private function randomDecimal(float $min, float $max, int $digit = 2)
    // {
    //     return mt_rand($min * 10, $max * 10) / pow(10, $digit);
    // }





    /* ********************************************************************  */
    public function index()
    {
        // Table Headings
        $headings = ['Expense/Driver', 'Amount $', 'John Sigono', 'Tom Davidson'];

        // Pavadinimas (išlaidų)
        $expenses = [
            'Fuel (EFS)',
            'Fuel (Comdata)',
            'Insurance (Truck)',
            'Insurance (Trailer)',
            'Engine Oil',
            'Tires',
            'Truck Wash',
            'Trailer Wash',
            'Flight Ticket',
        ]; 

        // Išlaidos:
        $amount = [100, 100.01, 27.27, 11.1, 117.17, 1107.57, 7.75, 7.5, 20];
        $amountTotal = array_sum($amount);

        // Vairuotojai pasiskirsto išlaidomis
        $driver1 = [];
        $driver2 = [];
    
        foreach ($amount as $index => $value)
        {
            $splitExpenses = $value / 2;
            $driver1[$index] = $splitExpenses; 
            $driver2[$index] = $splitExpenses - 0.001;
        }

        // Vairuotojų viso išlaidos
        $driver1Total = array_sum($driver1);
        $driver2Total = array_sum($driver2);

        return view('home', compact(['headings','expenses', 'amount', 'amountTotal', 'driver1', 'driver2', 'driver1Total', 'driver2Total']));
    }
}