#include <iostream.h>


class privet
{
      public:
             privet() { cout << "inicializaciya! \n"; }
             privet(int) { vsem = 7; }
             ~privet() { cout << "��������! \n"; }
            // void Getvsem () { vsem = vsem; }
             //int Setvsem (int) { return vsem; }  
      private:
              int vsem;
};


privet vsem;




int main()
{
    setlocale(LC_CTYPE, "Russian");
    cout << "���� ������! \n";
    
system("pause");
return 0;
}

