#include <iostream.h>

void swap (int x, int y);

int main()
{
    int x = 5, y = 10;
    cout << "x: " << x << "y: " << y << "\n";
    swap(x,y);
    cout << "konechniy res x: " << x << "y: " << y << "\n";
    system("pause");
    return 0;
}
void swap (int x, int y)
{
     int pen;
     
     cout << "vtoroi res x: " << x << "y: " << y << "\n";
     
     pen = x;
     x = y;
     y = pen;
     cout << "izmenenniy x: " << x << "y: " << y << "\n";
     }
     
     
