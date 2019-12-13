## Zadanie rekrutacyjne


 
 ##### przykadowe komendy:
 
    php src/console.php simple -u http://feeds.nationalgeographic.com/ng/News/News_Main -p C:\Users\Kuba\Desktop\fds\test.csv
    
    
    php src/console.php extend -u http://feeds.nationalgeographic.com/ng/News/News_Main -p C:\Users\Kuba\Desktop\fds\test.csv

    

 ##### This tool accepts a command as first parameter as outlined below:


   extend <OPTIONS>

     Pobiera dane z rss/atom i dopisuje je do pliku


     -u <1>, --urlExtend  Adres url z którego mają pobierać się dane
     <1>

     -p <1>, --pathExtend Scieżka do pliku
     <1>


   simple <OPTIONS>

     Pobiera dane z rss/atom i zapisuje je do pliku


     -u <1>, --url <1>    Adres url z którego mają pobierać się dane

     -p <1>, --path <1>   Scieżka do pliku

