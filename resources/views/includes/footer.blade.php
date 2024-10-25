<!-- Required Js -->
<!-- <script src="{{  asset('assets/js/vendor-all.min.js')        }}"></script> -->
<!-- <script src="{{  asset('assets/js/plugins/bootstrap.min.js') }}"></script> -->
<!-- <script src="{{  asset('assets/js/plugins/feather.min.js')   }}"></script> -->
<!-- <script src="{{  asset('assets/js/pcoded.min.js')            }}"></script>  -->

<!-- JQUERY -->
<script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/jquery/jquery-3.6.1.min.js') }}"></script>
<!-- <script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/jquery/jquery-3.5.1.min.js') }}"></script> -->
<!-- <script type="text/javascript" charset="utf8" src="{{  asset('vendorSystemFile/jquery/jquery-3.4.1.min.js') }}"></script> -->
<!-- JS AGREGADOS POREL PROGRAMADOR -->
<script src="{{  asset('vendorSystemFile/js/jsProcesosEstandar.js')  }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- SELECT CON BUSCAR INTEGRADO -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	setUrlBase("{{$urlJs}}");
</script>