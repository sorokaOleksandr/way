#include <iostream.h>

inline int Double(int);

int main()
{
    int target;
    
    cout << "Enter the namber to work wite: ";
    cin >> target;
    cout << "\n";
    
    target = Double(target);
    cout << "Target van: " << target << "\n";
    
    target = Double(target);
    cout << "Target two: " << target << "\n";
    
    target = Double(target);
    cout << "Target free: " << target << "\n\n";
    cout << "Soroka Aleksandr is programmer!!! " << endl;
    system("pause");
    return 0;
}

int Double(int target)
{
    return 2 * target;
}
    
