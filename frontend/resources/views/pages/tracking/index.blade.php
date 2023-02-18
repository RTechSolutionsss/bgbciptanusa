@php($no = 1)
@foreach ($tasks as $task)
<tr>
    <td>{{ $no++ }}</td>
    <td>{{ $task->name }}</td>
    <td>{{ $task->ip_address}}</td>
    <td>{{ \Carbon\Carbon::parse($task->created_at)->format('Y m d')}}</td>
    <td>
        @if(Auth::user()->role_id == 1)
        <input hidden name="idtask[]" value="{{ $task->id }}">
        <select class="form-control myselect {{ $task->status == 'COMPLETED' ? 'bg-success text-white' : ($task->status == 'REJECT' ? 'bg-danger text-white' : '') }}" name="status[]" id="mySelect{{ $task->id }}" onchange="onSelectChange{{ $task->id }}()">
            <option value="ON_PROGRESS" {{ $task->status == 'ON_PROGRESS' ? 'selected' : ''}}>ON PROGRESS</option>
            <option value="COMPLETED" class="text-white bg-success" {{ $task->status == 'COMPLETED' ? 'selected' : ''}}>COMPLETED</option>
            <option value="REJECT" class="text-white bg-danger" {{ $task->status == 'REJECT' ? 'selected' : ''}}>REJECT</option>
        </select>
        @else
            <p id="status">{{ $task->status }}</p>
        @endif
    </td>
</tr> 


<script>
    function onSelectChange{{ $task->id }}(){
        if (document.getElementById('mySelect{{ $task->id }}').value == "COMPLETED"){
            document.getElementById('mySelect{{ $task->id }}').className = 'form-control text-white bg-success';
        } else if(document.getElementById('mySelect{{ $task->id }}').value == "REJECT") {
            document.getElementById('mySelect{{ $task->id }}').className = 'form-control text-white bg-danger'
        }else{
            document.getElementById('mySelect{{ $task->id }}').className = 'form-control'
        }
    }
</script>
@endforeach