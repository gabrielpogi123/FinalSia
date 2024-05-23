<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() {
        $cars = Car::orderBy('id')->get();
        return view('cars', compact('cars'));

    }
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->back()->with('success', 'Car deleted successfully.');
    }


    // function generateCSV() {
    //     $cars = Car::orderBy('id')->get();

    //     $filename = '../storage/cars.csv';

    //     $file = fopen($filename, 'w+');

    //     foreach($cars as $off) {
    //         fputcsv($file, [
    //             $off->id,
    //             $off->make,
    //             $off->model,
    //             $off->rent_fee,
    //         ]);
    //     }
    // }


    public function generateCSV() {
        $cars = Car::orderBy('id')->get();

        $filename = 'cars.csv';

        $file = fopen('php://temp', 'w+');


        fputcsv($file, ['ID', 'Make', 'Model', 'Rent_Fee']);

        foreach($cars as $off) {
            fputcsv($file, [
                $off->id,
                $off->make,
                $off->model,
                $off->rent_fee,
            ]);
        }

        rewind($file);

        $response = response(stream_get_contents($file), 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);

        fclose($file);

        return $response;
    }


    public function pdf(){
        $cars = Car::orderBy('make')->get();
        $pdf = Pdf::loadView('car-list', compact('cars'));

        return $pdf->download('car-list.pdf');
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');

        $csvData = array_map('str_getcsv', file($file));

        foreach ($csvData as $row) {
            $make = $row[1];
            $model = $row[2];
            $rent_fee = $row[3];

            Car::create([
                'make' => $make,
                'model' => $model,
                'rent_fee' => floatval($rent_fee),
            ]);
        }

        return redirect()->route('cars')->with('success', 'Cars imported successfully.');
    }
}
