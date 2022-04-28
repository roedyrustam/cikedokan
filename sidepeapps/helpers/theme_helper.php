<?php
// create thumbnail with timthumb.php library
if ( ! function_exists('get_image'))
{
    function get_image($path,$width=600,$height=400,$alt='Picture',$class='img-responsive',$id=null)
    {
        $path1 = htmlspecialchars_decode($path);

        if (file_exists('./desa/upload/'.$path)){
            return '<img id="'.$id.'" src="'.base_url().'timthumb.php?src='.base_url().'desa/upload/'.$path.'&w='.$width.'&h='.$height.'&q=100" class="'.$class.'" alt="'.$alt.'">';
        } else {
            return '<img id="'.$id.'" src="'.base_url().'timthumb.php?src='.base_url().'assets/images/noimage.png&w='.$width.'&h='.$height.'&q=100" class="'.$class.'" alt="'.$alt.'">';
        }
    }
}

if ( ! function_exists('thumbnail_uri'))
{
    function thumbnail_uri($path, $width=600, $height=400)
    {
        $path1 = htmlspecialchars_decode($path);

        if (is_File(LOKASI_FOTO_ARTIKEL.'sedang_'.$path)){
            $uri = base_url().'timthumb.php?src='.base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$path.'&w='.$width.'&h='.$height.'&q=100';
        } else {
            $uri = base_url().'timthumb.php?src='.base_url().'assets/images/noimage.png&w='.$width.'&h='.$height;
        }

        return $uri;
    }
}

if ( ! function_exists('title'))
{
    function title($str, $prefix = '_')
    {
        $title = ucwords( str_replace($prefix, ' ', $str) );

        return $title;
    }
}

if ( ! function_exists('get_artikel_url'))
{
    function get_artikel_url($id, $id_kategori)
    {
        $CI =& get_instance();
        $permalink = "#";

        $query = $CI->db->select( "a.judul, a.slug, b.kategori, b.kategori_slug" )
        ->from('artikel as a')
        ->join( 'kategori as b', 'b.id=a.id_kategori' )
        ->where( array( 'a.id' => $id, 'b.id'=>$id_kategori ) )
        ->get();

        if ( $query->num_rows() > 0 ) 
        {
            $data = $query->row_array();
            
            $slug = ( $data['slug'] === '' || empty( $data['slug'] ) ) ? url_title( $data['judul'], '-', TRUE ) : $data['slug'];
            $kat_slug = ( $data['kategori_slug'] === '' || empty( $data['kategori_slug'] ) ) ? url_title( $data['kategori'], '-', TRUE ) : $data['kategori_slug'];
            $permalink = site_url( 'berita/detail/'.$kat_slug.'/'.$slug );
        }

        return $permalink;
    }
}

if ( ! function_exists('get_kategori_url'))
{
    function get_kategori_url( $id )
    {
        $CI =& get_instance();
        $permalink = "#";

        $query = $CI->db->select( "kategori_slug, kategori" )
        ->from('kategori')
        ->where( 'id', $id )
        ->get();

        if ( $query->num_rows() > 0 ) 
        {
            $data = $query->row_array();
            $kat_slug = ( $data['kategori_slug'] === '' || empty( $data['kategori_slug'] ) ) ? url_title( $data['kategori'], '-', TRUE ) : $data['kategori_slug'];
            $permalink = site_url( 'berita/kategori/'.$kat_slug );
        }

        return $permalink;
    }
}

/* FUNGSI UANG INDONESIA */
if ( ! function_exists('uang_indo'))
{
    function uang_indo($param)
    {
        $param = (int) $param;
        $result = "Rp ".number_format($param, 0, ",", ".").',00';

        return($result);
    }
}