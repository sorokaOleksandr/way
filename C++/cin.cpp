#include <iostream.h>

int main()
{
    char ch;
    cout << "enter the string: ";
    while( cin.get(ch) )
    {
           if(ch == '!')
            cin.putback('0'); //��������� ������ � �����
           else
            cout << ch;
           while( cin.peek() == '#' ) //������������� ������
            cin.ignore(1, '#'); // ������� ������
            
    }    
    
    system("pause");
                     //���������� ������ ��������� Ctrl+C
    return 0;
}
