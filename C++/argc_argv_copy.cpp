#define DEBUG

#include <iostream.h>

#ifndef DEBUG
   #define ASSERT(x)
#else
   #define ASSERT(x)\
          if(! (x)) \
          {   \
               cout << "Ошибка!!! " << #x << " \n"; \
               cout << " Файл: " << __FILE__ << "\n"; \
               cout << " Строка: " << __LINE__ << "\n"; \
          }
#endif






void func();
int main(int argc, char *argv[])
{
    setlocale(LC_CTYPE, "Russian");
    if(argc > 1)
    {
            cout << "Resived: " << argc << "arguments...\n";
            for(int i=0; i < argc; i++)
               cout << " arguments: " << i << ": " << argv[i] << endl;
               func();
    }
    else
    {
        cout << "not arguments" << endl;
    }
    system("pause");
    return 0;
}
void func()
{
     char ch;
     cin.get(ch);
     
     cout << "Konec! " << endl;
}

