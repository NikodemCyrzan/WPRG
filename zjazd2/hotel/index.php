<!DOCTYPE html>
<html>

<head></head>

<body>
    <form action="./other-guests.php" method="post">
        <label for="count">Ilość osób:</label>
        <select name="count" id="count">
            <option value="1" default>1</option>
            <option value="2" default>2</option>
            <option value="3" default>3</option>
            <option value="4" default>4</option>
        </select>
        <br>
        <hr>
        <div>
            <b>Dane osoby rezerwującej</b>
        </div>
        <br>
        <table>
            <tr>
                <td>
                    <label for="name">Imię*</label>
                </td>
                <td>
                    <input type="text" name="name" id="name" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="surname">Nazwisko*</label>
                </td>
                <td>
                    <input type="text" name="surname" id="surname" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="address">Adres*</label>
                </td>
                <td>
                    <input type="text" name="address" id="address" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="card-id">Number karty kredytowej*</label>
                </td>
                <td>
                    <input type="text" name="card-id" id="card-id" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email*</label>
                </td>
                <td>
                    <input type="email" name="email" id="email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="date">Data pobytu*</label>
                </td>
                <td>
                    <input type="date" name="date" id="date" required>
                </td>
            </tr>
        </table>
        <hr>
        <div>
            <b>Opcje dodatkowe</b>
        </div>
        <br>
        <table>
            <tr>
                <td>
                    <input type="checkbox" name="child-bed" id="child-bed">
                </td>
                <td>
                    <label for="child-bed">Łóżeczko dla dziecka</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="balcony" id="balcony">
                </td>
                <td>
                    <label for="balcony">Balkon</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="tv" id="tv">
                </td>
                <td>
                    <label for="tv">Telewizor</label>
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>

</html>