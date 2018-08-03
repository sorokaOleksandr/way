#include <iostream.h>
#include <fstream.h>
#include <conio.h>
#include <stdio.h>

int main()
{
    //clrscr();
    char MyFile[]="D:\\1.txt";
    char ch=NULL;
    
    ifstream in1(MyFile);
    
    while(!in1.eof())
    {
       ch=in1.get();
       cout << ch;
    }
    cout << "\n";
    
    in1.close();
    cin.get();
    system("pause");
    return 0;
}
