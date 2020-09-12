
@if ($errors->any())
  @foreach ($errors->all() as $error)
      <script>
           new PNotify({
                type: 'error',
                text:  " {!! $error!!}",
                nonblock: {
                    nonblock: true
                },
                styling: 'bootstrap3',
                addclass: 'danger'
            });
      </script>
  @endforeach
@endif
@if(session('error'))
<script>
     new PNotify({
          type: 'error',
          text:  " {!!session('error')!!}",
          nonblock: {
              nonblock: true
          },
          styling: 'bootstrap3',
          addclass: 'danger'
      });
</script>
@endif
@if(session('info'))
<script>
     new PNotify({
          type: 'info',
          text:  " {!!session('info')!!}",
          nonblock: {
              nonblock: true
          },
          styling: 'bootstrap3',
          addclass: 'danger'
      });
</script>
@endif
@if(session('warning'))
<script>
     new PNotify({
          type: 'warning',
          text:  " {!!session('warning')!!}",
          nonblock: {
              nonblock: true
          },
          styling: 'bootstrap3',
          addclass: 'danger'
      });
</script>
@endif
@if(session('success'))
<script>
     new PNotify({
          type: 'success',
          text:  " {!!session('success')!!}",
          nonblock: {
              nonblock: true
          },
          styling: 'bootstrap3',
          addclass: 'danger'
      });
</script>
@endif