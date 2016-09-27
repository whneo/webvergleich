<table border="1">
    <thead>
        <tr>
            <th colspan="3">Wählen sie ein Element zum vergleichen!</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <form action="index.php" method="POST">
                    <input style="width: 100%" type="submit" value="OpenHPI"></input>
                    <input type="hidden" name="openHpiVergleichenSent" value="1" />
                </form>
            </td>
            <td>

            </td>
            <td>
                <form action="index.php" method="POST">
                    <input style="width: 100%" type="submit" value="BBQ"></input>
                    <input type="hidden" name="bbqVergleichenSent" value="1" />
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <form action="index.php" method="POST">
                    <input style="width: 100%" type="submit" value="Leitfaden FISI"></input>
                    <input type="hidden" name="leitfadenFisiVergleichenSent" value="1" />
                </form>
            </td>
            <td>
                <form action="index.php" method="POST">
                    <input style="width: 100%" type="submit" value="IHK"></input>
                    <input type="hidden" name="ihkVergleichenSent" value="1" />
                </form>
            </td>
            <td>
                <form action="index.php" method="POST">
                    <input style="width: 100%" type="submit" value="Leitfaden FIAN"></input>
                    <input type="hidden" name="leitfadenFianVergleichenSent" value="1" />
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <form action="index.php" method="POST">
                    <input style="width: 100%" type="text" name="status" value="<?php echo $ausgabe; ?>" readonly="readonly" />
                </form>
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                <form action="index.php" method="POST">
                    <input style="width: 100%" type="submit" value="Zurück"></input>
                    <input type="hidden" name="homeSent" value="1" />
                </form>
            </td>
            <td>

            </td>
        </tr>
    </tbody>
</table>