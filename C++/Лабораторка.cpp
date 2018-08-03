#include  <iostream>
#include  <cmath>
#include  <float.h>

using namespace std;

double sin (double x, double eps, int& n)
{
	double res = 0;
	double prevRes = 0;
	int i = 1;
	__int64 f = 1;
	int sign = 1;
	double q = x;
	n = 0;
	do
	{
		prevRes = res;
		res += (q / f) * sign;
		q *= x * x;
		f *= (i + 1) * (i + 2);
		i += 2;

		//переполнение переменной
		if (n == 10)
		{
			break;
		}
		sign = -sign;
		++n;
	}
	while ((fabs(res - prevRes)) > eps);
	return res;
};

int main(void)
{
	const double PI = 3.141592653589793;
	double a = 0;
	double b = PI / 2;
	double f1 = 0;
	double f2 = 0;
	double diff = 0;
	int n = 0;
	for (a = PI / 4; a <= b; a += 0.1)
	{
		f1 = sin(a * a);
		f2 = sin(a * a, DBL_EPSILON, n);
		diff = fabs(f2 - f1);
		if (diff < 1e-15)
		{
			diff = 0;
		}
		cout << "x = " << a << ' ' << "f1(x) = " << f1 << ' ' << "f2(x) = " << f2 << ' ' << "diff = " << diff << ' ' << "n = " << n << endl;
	}
	cin.get();
	return 0;
}


