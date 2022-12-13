import exportFromJSON from "export-from-json";

class ExcelParser {
  exportDataFromJSON(data: any, newFileName: any, fileExportType: any) {
    if (!data) return;
    try {
      const fileName = newFileName || "exported-data";
      const exportType = (exportFromJSON.types as any)[
        fileExportType || "json"
      ];
      exportFromJSON({ data, fileName, exportType });
    } catch (e) {
      throw new Error("Parsing failed!");
    }
  }
}

export default new ExcelParser();
