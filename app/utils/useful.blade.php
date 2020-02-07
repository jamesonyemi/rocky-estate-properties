<div class="form-row">
    <div class="form-group col-md-4">
        <label for="title">Client</label>
        {{-- <select id="clientid" name="clientid" class="form-control custom-select" required aria-readonly="true">
            <option value="">-- select --</option>
            @foreach ( $clientWithProjects as $client_id => $client )
                @if ($client->clientid === $payment->clientid )
                <option value="{{ old($client->clientid) }}" class="text-capitalize" selected>
                    {{ ucwords( $client->full_name)  }}
                </option>
                @endif
            @endforeach
        </select> --}}
        @foreach ( $clientWithProjects as $client_id => $client )
        @if ($client->clientid === $payment->clientid && $client->pid === $payment->pid )
        <input type="text" value="{{ old('clientid', ucwords( $client->full_name))  }}" id="" class="form-control" readonly> 
        @endif
        @endforeach  
    </div>
    <div class="form-group col-md-2"></div>
    <div class="form-group col-md-4">
        <label for="bank-brank">Project</label>
        @foreach ( $clientWithProjects as $client_id => $client )
        @if ($client->clientid === $payment->clientid && $client->pid === $payment->pid )
        <input type="text" value="{{ old('pid', ucwords( $client->project_title))  }}" id="" class="form-control" readonly> 
        @endif
        @endforeach 
        {{-- <select id="pid" name="pid" class="form-control custom-select" required>
            <option value="">-- select --</option>
            @foreach ($clientWithProjects as $key => $client)
                @if ($client->pid ===$payment->pid )
                <option value="{{ old($client->pid) }}" class="text-capitalize" selected>
                    {{ ucwords( $client->project_title )  }}
                </option>
                @endif
            @endforeach
        </select>    --}}
    </div>
</div>