<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;

use App\Models\UangKeluar;

class UangKeluarController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UangKeluar::all();
        if (empty($data)) return $this->isEmpty();
        return $this->sendResponse(true, $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hasOnly = $request->has(['keperluan', 'nominal', 'tanggal']);

        if ($hasOnly) {
            $data = [
                'keperluan' => $request->keperluan,
                'nominal' => $request->nominal,
                'tanggal' => $request->tanggal
            ];

            UangKeluar::create($data);

            return $this->sendResponse(true, $data);
        } else {
            return $this->wasWrong();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = UangKeluar::where('id', $id)->first();
        if (empty($data)) return $this->isEmpty();

        return $this->sendResponse(true, $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $check = UangKeluar::where('id', $id)->first();
        $hasAny = $request->hasAny(['keperluan', 'nominal', 'tanggal']);

        if (!empty($check) && $hasAny) {
            $data = [
                'keperluan' => $request->keperluan ?: $check->keperluan,
                'nominal' => $request->nominal ?: $check->nominal,
                'tanggal' => $request->tanggal ?: $check->tanggal
            ];

            UangKeluar::where('id', $id)->update($data);

            return $this->sendResponse(true, $data);
        } else {
            return $this->wasWrong();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UangKeluar::where('id', $id)->delete();
        return response()->json(['message' => 'data has been deleted.']);
    }
}
