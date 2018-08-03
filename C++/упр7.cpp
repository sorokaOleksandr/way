#include <iostream.h>

int ObemCube(int dlina, int shirina = 25, int visota = 1);

int main()
{
    int dlina = 100;
    int shirina = 50;
    int visota = 2;
    int volume;
    
    volume = ObemCube(dlina, shirina, visota);
    cout << "Vse tri sostavlayshie prisutstvuyt! res: " << volume << "\n";
    
    volume = ObemCube(dlina, shirina);
    cout << "Tolko dlina i shirina! res: " << volume << "\n";
    
    volume = ObemCube(dlina);
    cout << "Zayavlena tolko dlina! res: " << volume << "\n";
    system("pause");
    return 0;
}

int ObemCube(int dlina, int shirina, int visota)
{
             return (dlina * shirina * visota);
             }
          
     
