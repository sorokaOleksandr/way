#include <iostream.h>

int main()
{
    int namber;
    cout << "Vvedite chislo ot 1 do 5: ";
    cin >> namber;
    cout << "Nachinaem schitat s chisla: \n";
    switch(namber)
    {
                  case 0: cout << "Namber to smol!!!\n";
                  break;
                  case 1: cout << " Odin!\n";
                  case 2: cout << " Dva!\n"; 
                  case 3: cout << " Tri!\n";
                  case 4: cout << " Cheturi!\n";
                  case 5: cout << " Pyat!\n";
                  break;
                  default : cout << "Namber to big!!!\n";
                  break;
                  }
                  system("pause");
                  return 0;
}
                  
