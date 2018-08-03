#include <iostream.h>
#include <string.h>

int main()
{
    int const MaxLenht = 50; 
    char buffer1[] = "Enter from keybord";  
     char buffer2[MaxLenht+1]; 
    cout << "Enter a string: ";
    cin.get(buffer1, 49);
    
    strncpy(buffer2, buffer1, MaxLenht);
    
    cout << "byffer1: " << buffer1 << endl;
    cout << "byffer2: " << buffer2 << endl;
    
    system("pause");
    return 0;
}
    
    
