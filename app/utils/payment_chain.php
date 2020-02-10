<?php

        $id               =  static::decryptedId($id);
        $createdBy        =  Auth::id();
        $updateData       =  ClientController::allExcept(); 
        $update           =  DB::table('tblpayment')->where('id', $id)->update($updateData);
        
        $lastPaymentMade  =  DB::table('tblpayment')->where('id', $id)->first();
        $currentAmt       =  round($lastPaymentMade->amt_received, 2);
        $findId           =  DB::table(static::$targetTable)->where('projectid', $lastPaymentMade->pid)->get();
        $projectIdExist   =  $findId;
        $previousTotal    =  round($projectIdExist[0]->total_payment_made, 2);
        
        $currentTotal     =  [ 'total_payment_made' => $previousTotal + $currentAmt ];
        $conditon         =  [ 'projectid' => $lastPaymentMade->pid ];
        $data             =  [ 'total_payment_made' =>  $currentTotal, 'created_by' => $createdBy, ];
       
        if ($update) 
        {
            $except       =  request()->except([
                '_token', '_method', 'amt_received', 'clientid', 
                'pid', 'receivedfrom', 'paymentmode', 'paymentdate',
                'bankname', 'bankbranch', 'chequeno', 'comments'
                ]);

            $processBalance   =  DB::table(static::$targetTable)->where( 'projectid', $conditon['projectid'])
                ->update( array_merge( $except, $data[ 'total_payment_made']), $data['created_by'] );
            dd($processBalance);
            return redirect()->route('payments.index')->with('success', 'Payment #   ' .$id. ' Updated');
        }