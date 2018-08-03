#include <iostream.h>

int main()
{
    char ch;
    cout << "enter the string: ";
    while( cin.get(ch) )
    {
           if(ch == '!')
            cin.putback('0'); //вставляет символ в поток
           else
            cout << ch;
           while( cin.peek() == '#' ) //просматривает символ
            cin.ignore(1, '#'); // удаляет символ
            
    }    
    
    system("pause");
                     //завершение роботы прогрпммы Ctrl+C
    return 0;
}
