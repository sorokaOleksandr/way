#include <iostream.h>

int main()
{
    char ch;
    cout << "Enter a phrase: ";
    while( cin.get(ch) )
    {
                      switch(ch)
                      {
                                case '!':
                                     cout << "[ ! ] - Vosklicatelniy znak! \n\n";
                                     break;
                                case '?':
                                     cout << " [ ? ] - Voprositelniy znak! \n\n";
                                     break;
                                default:
                                        cout << ch;
                                break;
                      }
    }
    system("pause");
    return 0;
}                                 
