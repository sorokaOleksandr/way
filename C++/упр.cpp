#include <iostream.h>
#include <math.h>

int main()
{
    int x, y;
    cout << "Enter two nambers. " << endl;
    cout << "VanX: " << endl;
    cin >> x;
    cout << "TwoY: " << endl;
    cin >> y;
    
    if(x > y)
    {
         x = y;
         cout << "x: " << x << endl;
         }
          else
          y = x;
          cout << "y: " << y << endl;
          system("pause");
          return 0;
}
