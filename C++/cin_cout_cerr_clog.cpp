#include <iostream.h>

int main()
{
    int x;
    cout << "Enter the x: ";
    cin >> x;
    cerr << "Uh oh, this to cerr!" << endl;
    clog << "Ouh oh, this to clog!" << endl;
    
    system("pause");
    return 0;
}
