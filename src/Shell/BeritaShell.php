<?php 
namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\Entity;
class BeritaShell extends Shell
{
	public function initialize()
    {
        parent::initialize();
        $this->loadModel('Articles');
    }

    public function main()
    {
        require_once(ROOT .DS. 'vendor' . DS . 'simplehtmldom' . DS . 'simple_html_dom.php');
        $content = file_get_html('http://news.okezone.com/topic/75/gempa');
        $jsons = json_decode($content);
        foreach($content->find('h2') as $e) {
            // Ini judul
            // echo($e->plaintext)."<br />";
            $title = $e->plaintext;
            $tag = explode( ' ', $title );
            $tags = join(',', $tag);
            $tags = str_replace(',,', ',', $tags);
            $tags = str_replace('di', ',', $tags);
            $tags = str_replace('pada', ',', $tags);
            $tags = str_replace('ke', ',', $tags);
            $tags = str_replace('karena', ',', $tags);
            $tags = preg_replace('/[0-9]/', '', $tags);
            $tags = str_replace(',,,', ',', $tags);
            $tags = str_replace('satu', '', $tags);
            $tags = str_replace('Satu', '', $tags);
            $tags = str_replace(',,', ',', $tags);
            $tags = str_replace('dua', '', $tags);
            $tags = str_replace('tiga', '', $tags);
            $tags = str_replace('empat', '', $tags);
            $tags = str_replace('lima', '', $tags);
            $tags = str_replace('enam', '', $tags);
            $tags = str_replace('tujuh', '', $tags);
            $tags = str_replace('delapan', '', $tags);
            $tags = str_replace('sembilan', '', $tags);
            $tags = str_replace('sepuluh', '', $tags);
            $tags = str_replace('dan', '', $tags);
            $tags = str_replace('itu', '', $tags);
            $tags = str_replace('ini', '', $tags);
            $tags = str_replace('hanya', '', $tags);
            $tags = str_replace('oleh', '', $tags);
            $tags = str_replace('akan', '', $tags);
            $tags = str_replace('alih-alih', '', $tags);
            $tags = str_replace('antara', '', $tags);
            $tags = str_replace('seantero', '', $tags);
            $tags = str_replace('bagaikan', '', $tags);
            $tags = str_replace('bagi', '', $tags);
            $tags = str_replace('sebelum', '', $tags);
            $tags = str_replace('buat', '', $tags);
            $tags = str_replace('dari', '', $tags);
            $tags = str_replace('demi', '', $tags);
            $tags = str_replace('dengan', '', $tags);
            $tags = str_replace('di atas', '', $tags);
            $tags = str_replace('terhadap', '', $tags);
            $tags = str_replace('hingga', '', $tags);
            $tags = str_replace('menjelang', '', $tags);
            $tags = str_replace('ke', '', $tags);
            $tags = str_replace('kecuali', '', $tags);
            $tags = str_replace('sekeliling', '', $tags);
            $tags = str_replace('mengenai', '', $tags);
            $tags = str_replace('sekitar', '', $tags);
            $tags = str_replace('melalui', '', $tags);
            $tags = str_replace('selama', '', $tags);
            $tags = str_replace('lepas', '', $tags);
            $tags = str_replace('lewat', '', $tags);
            $tags = str_replace('sepanjang', '', $tags);
            $tags = str_replace('per', '', $tags);
            $tags = str_replace('seputar', '', $tags);
            $tags = str_replace('bersama', '', $tags);
            $tags = str_replace('sampai', '', $tags);
            $tags = str_replace('sejak', '', $tags);
            $tags = str_replace('seluruh', '', $tags);
            $tags = str_replace('semenjak', '', $tags);
            $tags = str_replace('seperti', '', $tags);
            $tags = str_replace('serta', '', $tags);
            $tags = str_replace('sesudah', '', $tags);
            $tags = str_replace('tentang', '', $tags);
            $tags = str_replace('menuju', '', $tags);
            $tags = str_replace('menurut', '', $tags);

            $slug = preg_replace('/[^a-zA-Z0-9\']/', '-', $title);
            $slug = str_replace('--', '-', $slug);
            $slug = strtolower($slug);

            $input = [
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-01.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-02.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-03.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-04.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-05.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-06.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-07.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-08.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-09.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-10.jpg", 
                        "https://infogempa.com/artikel/wp-content/uploads/2016/04/gempa-bumi-indonesia-info-gempa-11.jpg", 
                    ];
            $rand_keys = array_rand($input, 2);

            // ini thumbnail
            // echo $input[$rand_keys[1]] . "\n";
            $thumb = $input[$rand_keys[1]];

            foreach($content->find('div.content-hardnews') as $div) {
                foreach($div->find('h2 a') as $a) {
                    $link = $a->href;
                    $artikel = file_get_html($link);
                    foreach ($artikel->find('div.detail-img') as $art) {
                        // ini artikelnya
                        // echo(str_replace('okezone','infogempa', str_replace('Okezone','Infogempa.com',$art->plaintext))).'<br />';
                        $konten = str_replace('okezone','infogempa', str_replace('Okezone','Infogempa.com',$art->plaintext));
                    }
                        // Manipulasi waktu
                        $date = date('Y-m-d H:i:s');
                        $date = strtotime($date);
                        $date = strtotime("+7 day", $date);
                        $time = date('Y-m-d H:i:s', $date);

                        $article = $this->Articles->find('all',[
                            'condition' => [ 'Articles.title' => '%'.$title.'%' ],
                            'limit' => 1
                        ])->all();

                        $value = [];
                        foreach ($article as $value) {
                        }
                            if ($value->title == $title) {
                                echo 'postingan sudah ada';
                                exit;
                                // DIE
                            } else {
                                // QUERY SAVE DATA BARU

                                $data = [];
                                $data['title'] = $title;
                                $data['thumbnail'] = $thumb;
                                $data['content'] = $konten;
                                $data['tags'] = $tags;
                                $data['slug'] = $slug;
                                $data['created'] = $time;
                                $data['modified'] = $time;

                                $data_save = $this->Articles->newEntity();
                                $data = (array)$data;
                                $data_save = $this->Articles->patchEntity($data_save, $data);
                                // debug($data_save);
                                // exit;
                                $this->Articles->save($data_save);
                                exit;
                            }
                    exit;
                }
            }
        } //end of funtion
    }
}
?>