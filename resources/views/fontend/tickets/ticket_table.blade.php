<table class="table table-actions table-striped table-hover mb-0" data-table>
    <thead>
      <tr style="background-color: #a1e7ff;">
        <th scope="col">STT</th>
        <th scope="col">Họ tên ứng viên</th>
        <th scope="col">Job</th>
        <th scope="col">Level</th>
        <th scope="col">Status</th>
        <th scope="col">Độ ưu tiên</th>
        <th scope="col" style="min-width: 75px;">Thời gian</th>
        <th scope="col">Người phụ trách</th>
      </tr>
    </thead>
    <tbody>
      
      @if (isset($tickets))
      @foreach ($tickets as $ticket)
      <tr onclick="window.location='{{route('detail-ticket', ['id' => $ticket->id])}}';">
        <td>{{$stt++}}</td>
        <td>{{$ticket->name}}</td>
        <td>{{$ticket->job->name}}</td>
        <td>{{$ticket->level->name}} </td>
        <td><span class="badge badge-pill badge-primary"><?php if($ticket->status ==1) echo'Request review' ?>
          <?php if($ticket->status ==2) echo'Đồng ý phỏng vấn' ?>
          <?php if($ticket->status ==3) echo'Loại' ?>
          <?php if($ticket->status ==4) echo'Setup phỏng vấn' ?>
          <?php if($ticket->status ==5) echo'Offer' ?>
          <?php if($ticket->status ==6) echo'Nhận offer' ?>
          <?php if($ticket->status ==7) echo'Từ chối offer' ?>
          <?php if($ticket->status ==8) echo'Đã check in' ?>
          <?php if($ticket->status ==9) echo'Pending' ?>
          <?php if($ticket->status ==10) echo'Closed' ?>
        </span></td>
        <td><span class="badge badge-pill badge-primary"><?php if($ticket->priority==1) echo'Low' ?>
          <?php if($ticket->priority==2) echo'Normal' ?>
          <?php if($ticket->priority==3) echo'High' ?>
          <?php if($ticket->priority==4) echo'Urgent'?>
          <?php if($ticket->priority==5) echo'Immediate' ?>
        </span></td>
        <td>{{date("d-m-Y", strtotime($ticket->start))}} {{date("d-m-Y", strtotime($ticket->deadline))}}</td>
        <td>
          @foreach ($ticket->users as $user_assign)
              <span>{{$user_assign->email}}</span><br>
          @endforeach
        </td>
      </tr>
      @endforeach
      @endif

    </tbody>
 </table>