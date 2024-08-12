import sys
from pathlib import Path
import importlib
import subprocess
import codewars_test

def run_tests():
    path_answer = sys.argv[1]
    filename = sys.argv[2]

    # Mengimpor modul dari path yang diberikan
    try:
        pc = importlib.import_module(path_answer, ".")
    except ImportError as e:
        print(f"Error importing module: {e}")
        sys.exit(1)

    # Menjalankan skrip Python dan menangkap output
    script_path = Path(__file__).parent.absolute() / f"jawaban/{filename}.py"
    cmd = subprocess.run([sys.executable, str(script_path)], capture_output=True)

    @codewars_test.describe('BAB 1')
    def percobaan1():
        @codewars_test.it('|Test Output Indonesia-')
        def test_indonesia():
            actual_output = result.stdout.strip()
            expected_output = "10 anak"
    
            try:
                codewars_test.assert_equals(actual_output, expected_output, 'Error: Output tidak sesuai!')
            except AttributeError as e:
                print(e)

if __name__ == '__main__':
    run_tests()