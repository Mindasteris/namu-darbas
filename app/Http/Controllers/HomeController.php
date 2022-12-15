<?php
 
namespace App\Http\Controllers;

use App\Services\DriverExpenseService;
  
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(DriverExpenseService $driverExpenseService)
    {
        // Data is hardcoded for test purposes.
        $drivers = ['John Sigono', 'Tom Davidson'];

        $expenses = $this->generateTestExpenses();

        return view('home', [
            'data' => $driverExpenseService->calculateDriverExpenses($drivers, $expenses),
        ]);
    }

    private function generateTestExpenses()
    {
        $result = [];

        $expenseTypes = [
            'Fuel (EFS)', 
            'Fuel (Comdata)', 
            'Insurance (Truck)', 
            'Insurance (Trailer)', 
            'Engine oil', 
            'Tires', 
            'Truck wash', 
            'Trailer wash', 
            'Flight tickets',
        ];

        $iterations = rand(1, 9);

        for ($i = 0; $i < $iterations; $i++) 
        {
            $expense = $expenseTypes[$i];
            
            $result[$expense] = number_format(rand(1, 15000) / 10, 2, '.', '');
        }

        return $result;
    }
}