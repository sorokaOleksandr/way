#include <iostream.h>

int Doubler(int AmountToDouble);

int main()
{
    int result = 0;
    int input;
    
    cout << "Enter the namber ot 0 do 10000: " << endl;
    cin >> input;
    cout << "input: " << input << " result: " << result << "\n";
    
    result = Doubler(input);
    
    cout << "Konechniy result input: " << input << " result: " << result << "\n";
    system("pause");
    return 0;
}
int Doubler(int original)
{
    if(original <= 10000)
     return original * 2;
    else
     return -1;
}
    
